<?php

namespace DiscussionBundle\Service;

class Tools
{
    private $doctrine;

    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getUid()
    {
        // Make infinite loop for demonstration purposes how can check recursivelly
        while(true) {
            // Get random uid
            $rand = '';
            for ($a = 0; $a < 10; $a++) {
                $nums = range(0, 9);
                shuffle($nums);
                $rand .= (string)current(array_slice($nums, end($nums), 1));
            }

            // Find it in db
            $search = $this->doctrine->getRepository('DiscussionBundle:Question')->findUid($rand);
            if (empty($search)) {
                return $rand;
            }
        }
    }
}
