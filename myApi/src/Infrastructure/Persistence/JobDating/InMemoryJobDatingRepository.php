<?php
    declare(strict_types=1);

    namespace App\Infrastructure\Persistence\JobDating;

    use App\Domain\JobDating\JobDating;
    use App\Domain\JobDating\JobDatingNotFoundException;
    use App\Domain\JobDating\JobDatingRepository;

    class InMemoryJobDatingRepository implements JobDatingRepository
    {
        /**
         * @var JobDating[]
         */
        private $jobDatings;

        /**
         * InMemoryJobDatingRepository constructor.
         *
         * @param array|null $jobDatings
         */
        public function __construct(array $jobDatings = null)
        {
            $this->jobDatings = $jobDatings ?? [
                    1 => new JobDating(1, 'DWMG2', '06/02/2020', 'Lyon - Confluence'),
                    2 => new JobDating(2, 'DWMG12', '13/12/2019', 'Lyon - VilleurBanne'),
                    3 => new JobDating(3, 'Prep FullStack', '02/09/2020', 'Suisse - Geneve'),
                ];
        }

        /**
         * {@inheritdoc}
         */
        public function findAll(): array
        {
            // Database Request
            // Return results
            return array_values($this->jobDatings);
        }

        /**
         * {@inheritdoc}
         */
        public function findJobDatingOfId(int $id): JobDating
        {
            // Database Request
            // If jobDating ID not found
            if (!isset($this->jobDatings[$id])) {
                // Throw exception
                throw new JobDatingNotFoundException();
            }

            return $this->jobDatings[$id];
        }
    }
