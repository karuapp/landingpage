<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = "https://api.whatsappworks.com/tenantApiStoreTenant";
    $whatsapp_api_url = "https://api.whatsappworks.com/v2/api/external/ac1531c5-9bd9-49da-9604-f4252e566911";

    $headers = [
        "Authorization: Bearer Z(KvRK}Kkadt2PX*&.n2p955Nk&]>;=A(()WDPW*07{s[Qf",
        "Content-Type: application/json"
    ];

    $plan = explode("-", $_POST["plan"]);
    $maxUsers = $plan[0];
    $maxConnections = $plan[1];
    $trial = isset($_POST["trial"]) ? "enabled" : "disabled";

    // Datos del usuario
    $name = $_POST["name"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $identity = $_POST["identity"];
    $profile = $_POST["profile"];
    $whatsappNumber = $_POST["whatsapp"] ?? ""; // Nuevo campo

    $data = [
        "status" => "active",
        "name" => $name,
        "maxUsers" => (int) $maxUsers,
        "maxConnections" => (int) $maxConnections,
        "acceptTerms" => true,
        "email" => $email,
        "password" => $_POST["password"],
        "userName" => $userName,
        "identity" => $identity,
        "profile" => $profile,
        "trial" => "enabled",
        "trialPeriod" => 21
    ];

    // Enviar solicitud de registro
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        // Si el registro es exitoso, enviar mensaje de WhatsApp
        if (!empty($whatsappNumber)) {
    $message = "📢 *Bienvenido a WhatsappWorks!* 🎉\n\n";
    $message .= "🟢 *Nombre de la empresa:* $name\n";
    $message .= "👤 *Nombre de usuario:* $userName\n";
    $message .= "📧 *Correo electrónico:* $email\n";
    $message .= "📱 *Número de WhatsApp:* $whatsappNumber\n\n";
    $message .= "🤝 ¡Gracias por unirte!\n\n";
    $message .= "*Equipo WhatsappWorks* 🚀";

    $whatsapp_data = [
        "body" => $message, // No usar urlencode aquí
        "number" => $whatsappNumber,
        "externalKey" => uniqid(),
        "bearertoken" => "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0ZW5hbnRJZCI6MSwicHJvZmlsZSI6ImFkbWluIiwic2Vzc2lvbklkIjoxNCwiaWF0IjoxNzQyNzczODMzLCJleHAiOjE4MDU4NDU4MzN9.TgnOAzPxssRZ5_GMtSuU3m2Ws7DlgSJzYAJoiOZX2T4",
        "isClosed" => false
    ];

    $ch = curl_init($whatsapp_api_url . "/params/?" . http_build_query($whatsapp_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_exec($ch);
    curl_close($ch);
}

        // Redirigir al usuario tras el registro exitoso
        header("Location: https://chat2.marcablancasaas.com/");
        exit();
    } else {
        echo "Error en el registro: " . $response;
    }
}
?>
