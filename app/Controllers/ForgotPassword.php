<?php
namespace App\Controllers;


use CodeIgniter\Email\Email;

class ForgotPassword extends BaseController
{
    public function index()
    {
        return view('backend/auth/forgot_password');
    }

    public function reset_password()
    {
        $email = $this->request->getVar('email');

        

        $user = $this->users->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email not found');
        }

        $dataConfig = [
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.googlemail.com',
            'SMTPUser' => 'geniuscodeparty1337@gmail.com',
            'SMTPPass' => 'xkigdaocwikhduau',
            'SMTPort' => 587,
            'SMTPCrypto' => 'tls',
            'SMTPTimeout' => 30,
            'charset' => 'utf-8',
            'wordWrap' => true,
            'newline' => "\r\n"
        ];
        $this->email->initialize($dataConfig);
        $this->email->setFrom('geniuscodeparty1337@gmail.com', 'Tax Center Gunadarma');
        $this->email->setTo($emailuser);
        $this->email->setSubject('Konfirmasi Akun Pelatihan Tax Center Gunadarma');
        $this->email->setMessage('          Yth. Bapak/Ibu ' . $fullname.'

        Terima kasih atas kepercayaan Bapak/Ibu telah melakukan'.'
        pembelian pada website kami.'.'
        
        Berikut kami lampirkan akun untuk pelatihan:'.'
        Username : '. $emailuser.'
        Password : '. $defaultpas.'
        
        Salam'.'
        Tax Center Universitas Gunadarma');
        $hasil = $this->email->send();

        $token = md5(rand(0, 1000));

        $this->users->update($user->user_id, [
            'reset_token' => $token,
            'reset_expiration' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ]);
        ini_set('SMTP', "server.com");
        ini_set('smtp_port', "25");
        ini_set('sendmail_from', "email@domain.com");
        $to = $email;
        $subject = 'Reset Password Link';
        $message = 'Click this link to reset your password: ' . base_url() . 'reset-password/' . $token;
        $headers = 'From: yourname@example.com' . "\r\n" .
            'Reply-To: yourname@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        return redirect()->back()->with('success', 'Reset password link has been sent to your email');
    }
}
