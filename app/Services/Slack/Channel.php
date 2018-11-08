<?php namespace App\Services\Slack;

class Channel extends SlackResource
{

    protected $actions = [
        'list',
        'kick',
        'mark',
        'join',
        'info',
        'leave',
        'create',
        'rename',
        'invite',
        'replies',
        'archive',
        'history',
        'setTopic',
        'unarchive',
        'setPurpose',
    ];

    protected $resources = ['channels'];

}
