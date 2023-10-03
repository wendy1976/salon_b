//<?php

/*namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ChiffreAffaire;
use Swift_Mailer;
use Swift_Message;

#[AsCommand(
    name: 'app:email-reminder',
    description: 'Envoi mail le 5 du mois pour remplir le CA du mois précédent',
)]
class EmailReminderCommand extends Command
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, Swift_Mailer $mailer)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    protected function configure(): void
    {
        $this->setDescription('Envoi mail le 5 du mois pour remplir le CA du mois précédent');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $currentDate = new \DateTime();
        $currentDay = $currentDate->format('d');

        // Vérifiez si c'est le 5 du mois
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
                $message = (new Swift_Message('Rappel de saisie de chiffre d\'affaires'))
                    ->setFrom('votre@email.com')
                    ->setTo('destinataire@email.com')
                    ->setBody(
                        $this->getContainer()->get('twig')->render(
                            'emails/email_reminder.html.twig'
                        ),
                        'text/html'
                    );

                $this->mailer->send($message);

                $io->success('E-mail de rappel envoyé avec succès.');
            }
        }

        return Command::SUCCESS;
    }
}
*/