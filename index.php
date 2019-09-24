<?php
require_once('./LINEBotTiny.php');
$channelAccessToken = 'QBClYHVKEe6uXDjoX9ox1k5rcbO9/9EWg+1PzNU01PglgniEIrkPaWyMxv49rkcHnIQNVEuN/WqsM+uVzhoimxq3EL04UviKWc6ODp1PzQ/mQDh652/RjczwMtDyL2HdW8S0az47Gjpq1JcTWGWj5AdB04t89/1O/w1cDnyilFU=
';
$channelSecret = '09ab3a3f8649944e3d75f138002226ad';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => $message['text']
                            ]
                        ]
                    ]);
                    break;
                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
?>