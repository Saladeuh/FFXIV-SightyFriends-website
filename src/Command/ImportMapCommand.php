<?php

namespace App\Command;

use App\Entity\Map;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'importMap',
)]
class ImportMapCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        if (($handleMaps = fopen(__DIR__.'/Map.csv', 'r')) !== false && ($handleNames = fopen(__DIR__.'/PlaceName.csv', 'r')) !== false) {
            $maps = [];
            $names = [];
            while (($mapRow = fgetcsv($handleMaps)) !== false) {
                $maps[] = $mapRow;
            }
            while (($nameRow = fgetcsv($handleNames)) !== false) {
                $names[] = $nameRow;
            }
            fclose($handleMaps);
            fclose($handleNames);
            foreach ($maps as $map) {
                $nameId = $map[13];
                if (is_numeric($nameId)) {
                    $placeName = $names[$nameId][1];
                    $io->writeln($placeName);
                    $mapEntity = (new Map())->setGameId((int) $map[0])->setPlaceName($placeName);
                    $this->entityManager->persist($mapEntity);
                }
            }
            $this->entityManager->flush();
        }

        return Command::SUCCESS;
    }
}
