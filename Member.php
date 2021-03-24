<?php

    class Member {
        private $identity;
        private $name;
        private $email;
        private $hometown;
        private $hobby;
        private $avatar;

        /**
         * Member constructor.
         * @param $identity
         * @param $name
         * @param $email
         * @param $hometown
         * @param $hobby
         * @param $avatar
         */
        public function __construct($identity, $name, $email, $hometown, $hobby, $avatar)
        {
            $this->identity = $identity;
            $this->name = $name;
            $this->email = $email;
            $this->hometown = $hometown;
            $this->hobby = $hobby;
            $this->avatar = $avatar;
        }

        /**
         * @return mixed
         */
        public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * @param mixed $identity
         */
        public function setIdentity($identity): void
        {
            $this->identity = $identity;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getHometown()
        {
            return $this->hometown;
        }

        /**
         * @param mixed $hometown
         */
        public function setHometown($hometown): void
        {
            $this->hometown = $hometown;
        }

        /**
         * @return mixed
         */
        public function getHobby()
        {
            return $this->hobby;
        }

        /**
         * @param mixed $hobby
         */
        public function setHobby($hobby): void
        {
            $this->hobby = $hobby;
        }

        /**
         * @return mixed
         */
        public function getAvatar()
        {
            return $this->avatar;
        }

        /**
         * @param mixed $avatar
         */
        public function setAvatar($avatar): void
        {
            $this->avatar = $avatar;
        }

    }

?>