<?php

namespace DiscussionBundle\Repository;

/**
 * QuestionRepository
 */
class QuestionRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Find and return questions bound with whole information
     */
    public function findAllQuestions()
    {
        $sql =
            'SELECT
                q.id, q.title, q.content, q.created_at, a.answers_count, vq.viewed_count, group_concat(t.name) tags, u.id AS user_id, u.username, r.estimate,
                IF (bs.answer_id, 1, NULL) AS best_answer_exists
            FROM question AS q
                LEFT JOIN (SELECT id, question_id, COUNT(question_id) AS answers_count FROM answer GROUP BY question_id) AS a
            ON q.id = a.question_id
                LEFT JOIN (SELECT question_id, count(user_id) AS viewed_count FROM viewed_questions_by_users GROUP BY question_id) AS vq
            ON q.id = vq.question_id
                LEFT JOIN questions_tags AS qt
            ON q.id = qt.question_id
                LEFT JOIN tag AS t
            ON qt.tag_id = t.id
                LEFT JOIN fos_user AS u
            ON q.user_id = u.id
                LEFT JOIN (SELECT question_id, SUM(estimate) AS estimate FROM rating GROUP BY question_id) AS r
            ON q.id = r.question_id
                LEFT JOIN best_answer AS bs
            ON q.id = bs.question_id
            	GROUP BY q.id
            ';

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Find question by given id
     */
    public function findOneQuestionById($questionId, $userId)
    {
        $sql =
        'SELECT
        	q.id, q.title, q.content, q.uid, q.created_at,  vq.viewed_count, group_concat(t.name) tags, u.id AS user_id, u.username, r.estimate,
            IF (fq1.question_id, 1, NULL) AS is_favorite_by_current_user, fq2.favorites_count,
            (SELECT estimate FROM rating WHERE question_id = q.id AND user_id = :userId LIMIT 1) AS rating_estimate_by_current_user
        FROM question AS q
            LEFT JOIN (SELECT question_id, count(user_id) AS viewed_count FROM viewed_questions_by_users GROUP BY question_id) AS vq
        ON q.id = vq.question_id
            LEFT JOIN questions_tags AS qt
        ON q.id = qt.question_id
            LEFT JOIN tag AS t
        ON qt.tag_id = t.id
        	LEFT JOIN fos_user AS u
        ON q.user_id = u.id
        	LEFT JOIN (SELECT question_id, SUM(estimate) AS estimate FROM rating GROUP BY question_id) AS r
        ON q.id = r.question_id
        	LEFT JOIN favorite_questions AS fq1
        ON q.id = fq1.question_id AND fq1.user_id = :userId
            LEFT JOIN (SELECT question_id, count(*) favorites_count FROM favorite_questions GROUP BY question_id) fq2
    	ON q.id = fq2.question_id
            WHERE q.id = :questionId
            GROUP BY q.id';

        $params = ['questionId' => $questionId, 'userId' => $userId];
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }
}
