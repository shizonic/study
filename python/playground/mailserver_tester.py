import cmd, sys, smtplib


class MailserverTester(cmd.Cmd):
    intro = 'Welcome to the mailserver tester. Type help or ? to list commands.\n'

    def do_bye(self, arg):
        return True

    def do_hello(self, s):
        if s == '':
            s = input('Your name please: ')
        print('Hello', s)

    def do_smtp_ssl(self, s):
        """Send an email via SMPT."""

        default = 'mail.example.com'
        host = input('Host [%s]: ' % default)
        host = host or default

        default = 'john'
        username = input('Username [%s]: ' % default)
        username = username or default

        default = 'doe'
        password = input('Password [%s]: ' % default)
        password = password or default

        default = '465'
        port = input('Port [%s]: ' % default)
        port = port or default

        default = ''
        recipient = input('Recipient [%s]: ' % default)
        recipient = recipient or default

        subject = "Hello from mailtester!"
        text = "This message was sent with Python's smtplib."
        message = 'From: {}\nSubject: {}\n\n{}'.format(recipient, subject, text)

        # Send the mail
        server = smtplib.SMTP_SSL(host, port)
        server.login(username, password)
        server.sendmail(recipient, [recipient], message)
        server.quit()

        print('Email was sent successfully. Please check your inbox (and spam folder)!')

if __name__ == '__main__':
    mailserverTester = MailserverTester()
    mailserverTester.prompt = '> '
    mailserverTester.cmdloop()
