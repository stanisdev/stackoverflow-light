<?php

namespace DiscussionBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OverviewControllerTest extends WebTestCase
{
    public function testQuestions()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/questions');
    }

    public function testTags()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tags');
    }

}
