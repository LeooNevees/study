<?php

// Subsistemas
// 1. Serviço de configuração do transporte
class MailTransportService
{
    public function configureTransport(): void
    {
        echo "Configurando transporte de e-mail (SMTP ou API)...\n";
    }
}


// 2. Serviço para construção do e-mail
class MailBuilderService
{
    public function buildEmail(string $to, string $subject, string $body): array
    {
        echo "Construindo e-mail para {$to}...\n";
        return [
            'to' => $to,
            'subject' => $subject,
            'body' => $body,
        ];
    }
}


// 3. Serviço de envio do e-mail
class MailSenderService
{
    public function send(array $email): bool
    {
        echo "Enviando e-mail para {$email['to']}...\n";
        // Simulação de envio
        return true;
    }
}



// Criando a Facade
class EmailFacade
{
    private MailTransportService $transportService;
    private MailBuilderService $builderService;
    private MailSenderService $senderService;

    public function __construct()
    {
        $this->transportService = new MailTransportService();
        $this->builderService = new MailBuilderService();
        $this->senderService = new MailSenderService();
    }

    public function send(string $to, string $subject, string $body): bool
    {
        // Configurando transporte
        $this->transportService->configureTransport();

        // Construindo o e-mail
        $email = $this->builderService->buildEmail($to, $subject, $body);

        // Enviando o e-mail
        return $this->senderService->send($email);
    }
}



// Usando a Facade
$emailFacade = new EmailFacade();

$to = "usuario@exemplo.com";
$subject = "Bem-vindo ao nosso sistema!";
$body = "Olá! Estamos felizes em tê-lo conosco.";

if ($emailFacade->send($to, $subject, $body)) {
    echo "E-mail enviado com sucesso!\n";
} else {
    echo "Falha no envio do e-mail.\n";
}

