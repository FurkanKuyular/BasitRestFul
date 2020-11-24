<?php

namespace App\Command;

use App\Entity\Users;
use Psr\Log\LoggerInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserCommand extends Command
{
    public static $defaultName = 'user:create';

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoders;

    /**
     * @param ContainerInterface           $container
     * @param LoggerInterface              $logger
     * @param UserPasswordEncoderInterface $encoders
     */
    public function __construct(ContainerInterface $container, LoggerInterface $logger, UserPasswordEncoderInterface $encoders)
    {
        $this->container = $container;
        $this->encoders = $encoders;
        $this->logger = $logger;

        parent::__construct();
    }

    public function configure()
    {
        parent::configure();

        $this
            ->setDescription('Welcome to user create console.
             if you wanna see console skills write to "--help"')
            ->setHelp('user:create');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $io = new SymfonyStyle($input, $output);

            $answers = $this->questions($input, $output);

            $user = new Users();

            /** @var Registry $entityManager */
            $entityManager = $this->container->get('doctrine');

            $user->setUsername($answers['name']);
            $user->setPassword($this->encoders->encodePassword($user, $answers['password']));
            $user->setIsActive($answers['isActive']);
            $user->setRoles(['ROLE_USER']);

            $entityManager->getManager()->persist($user);
            $entityManager->getManager()->flush();

            $io->success('user created');
        } catch (\Throwable $exception) {
            $this->logger->error(sprintf('user could not created %s', $exception));
        }
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return array|null
     */
    public function questions(InputInterface $input, OutputInterface $output): ?array
    {
        try {
            $helper = $this->getHelper('question');

            $questionName = new Question('username: ');
            $questionPassword = new Question('password: ');
            $questionActive = new ConfirmationQuestion('active situation ? y/n: ', true);

            $name = $helper->ask($input, $output, $questionName);
            $password = $helper->ask($input, $output, $questionPassword);
            $isActive = $helper->ask($input, $output, $questionActive);

            return [
                'name' => $name,
                'password' => $password,
                'isActive' => $isActive,
            ];
        } catch (\Throwable $exception) {
            $this->logger->error(sprintf('UserCommand-questions %s', $exception));
        }

        return null;
    }
}
