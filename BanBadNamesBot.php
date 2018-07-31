<?php
const TOKEN = '1234567890:123456ABCDEF123456ABCDEF';
const USE_REGEX = false;
const FILTER = 'sex';

require __DIR__ . '/vendor/autoload.php';

$bot = new kyle2142\PHPBot(TOKEN);

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message']['new_chat_members'])) {
    foreach ($update['message']['new_chat_members'] as $member) {
        if (matches_filter($member))
        {
            try{
                $bot->api->kickChatMember(['chat_id' => $update['message']['chat']['id'], 'user_id' => $member['id']]);
            } catch (\kyle2142\TelegramException $e) {
                error_log($e);
            }
        }
    }
}

function matches_filter($user) {
    $details = [ $user['first_name'] ];
    if (isset($user['last_name'])) $details[] = $user['last_name'];
    if (isset($user['username'])) $details[] = $user['username'];

    if (USE_REGEX) {
        return (bool) preg_grep(FILTER, $details);
    }
    foreach($details as $d) {
        if(stripos($d, FILTER) !== false) 
            return true;
    }
    return false;
}