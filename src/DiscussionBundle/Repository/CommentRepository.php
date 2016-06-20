<?php

namespace DiscussionBundle\Repository;

/**
 * CommentRepository
 */
class CommentRepository extends \Doctrine\ORM\EntityRepository
{
    public function findCommentsByQuestionId($questionId)
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.user', 'u')
            ->select('c.id, c.content, c.createdAt, u.id AS userId, u.username')
            ->where('c.question = :questionId')
            ->setParameter('questionId', $questionId)
            ->orderBy('c.createdAt', 'ASC')
            ->setMaxResults(3)
            ->setFirstResult(0)
            ->getQuery()
            ->getResult();
    }
}
