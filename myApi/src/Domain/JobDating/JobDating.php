<?php
    declare(strict_types=1);

    namespace App\Domain\JobDating;

    use JsonSerializable;

    class JobDating implements JsonSerializable
    {
        /**
         * @var int|null
         */
        private $id;

        /**
         * @var string
         */
        private $name;

        /**
         * @var string
         */
        private $date;

        /**
         * @var string
         */
        private $place;

        /**
         * @param int|null  $id
         * @param string    $name
         * @param string    $date
         * @param string    $place
         */
        public function __construct(?int $id, string $name, string $date, string $place)
        {
            $this->id = $id;
            $this->name = strtolower($name);
            $this->date = ucfirst($date);
            $this->place = ucfirst($place);
        }

        /**
         * @return int|null
         */
        public function getId(): ?int
        {
            return $this->id;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @return string
         */
        public function getDate(): string
        {
            return $this->date;
        }

        /**
         * @return string
         */
        public function getPlace(): string
        {
            return $this->place;
        }

        /**
         * @param object $datas
         * @return bool
         */
        public function update(object $datas): bool {
            $response = false;
            foreach ($datas as $k => $v) {
                if(!empty($this->{$k}) && $this->{$k} !== $v) {
                    $this->{$k} = $v;
                    $response = true;
                }
            }
            return $response;
        }

        /**
         * @return array
         */
        public function jsonSerialize()
        {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'date' => $this->date,
                'place' => $this->place,
            ];
        }
    }
