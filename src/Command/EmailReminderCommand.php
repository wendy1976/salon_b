<?php
# Envoi mail le 5 du mois pour remplir le CA du mois précédent
namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ChiffreAffaire;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

#[AsCommand(
    name: 'app:email-reminder',
    description: 'Envoi mail le 5 du mois pour remplir le CA du mois précédent',
)]
class EmailReminderCommand extends Command
{
    private $entityManager;
    private $mailer;
    private $twig;

    public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer, Environment $twig)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    protected function configure(): void
    {
        $this->setDescription('Envoi mail le 5 du mois pour remplir le CA du mois précédent');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        dump('Commande exécutée !'); 
        $io = new SymfonyStyle($input, $output);
        $currentDate = new \DateTime();
        $currentDay = $currentDate->format('d');

        // Vérifiez si c'est le 5 du mois
        dump('Avant la vérification de la date du mois');
        if ($currentDay === '05') {
            // Calculez le mois précédent
            $currentMonth = $currentDate->format('m');
            $previousMonth = (int) $currentMonth - 1;

            // Accédez à la base de données pour vérifier si le mois précédent est vide
            $repository = $this->entityManager->getRepository(ChiffreAffaire::class);
            $previousMonthData = $repository->findBy([
                'month' => $previousMonth,
            ]);

            // Si le mois précédent est vide, envoyez l'e-mail de rappel
            if (empty($previousMonthData)) {
                dump('Avant l\'envoi de l\'e-mail de rappel');
                $email = (new Email())
                    ->from('caroline.ferru@free.fr')
                    ->to('caroline.ferru@epsi.fr')
                    ->subject('Rappel de saisie de chiffre d\'affaires')
                    ->html($this->twig->render('emails/email_reminder.html.twig'));

                $this->mailer->send($email);

                $io->success('E-mail de rappel envoyé avec succès.');
            }
        }

        return Command::SUCCESS;
    }
}
