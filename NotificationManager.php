<?php
class NotificationManager {
    private static function checkInternet() {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            fclose($connected);
            return true;
        }
        return false;
    }

    public static function sendWhatsAppNotification($message) {
        if (!self::checkInternet()) {
            return false;
        }

        $url = "https://graph.facebook.com/v17.0/" . WHATSAPP_PHONE_NUMBER_ID . "/messages";
        
        $data = [
            "messaging_product" => "whatsapp",
            "to" => ADMIN_PHONE_NUMBER,
            "type" => "text",
            "text" => [
                "body" => $message
            ]
        ];

        $headers = [
            "Authorization: Bearer " . WHATSAPP_TOKEN,
            "Content-Type: application/json"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode >= 200 && $httpCode < 300;
    }
}