<?php namespace App\Services\Slack;

class Channel extends SlackResource
{

    protected $actions = [
        'create',
        'list',
        'archive',
        'unarchive',
        'setPurpose',
        'invite',
        'leave',
        'kick',
        'mark',
        'rename',
        'replies',
        'setTopic',
        'history',
        'join',
        'info'
    ];
    protected $resources = ['channels'];

}
