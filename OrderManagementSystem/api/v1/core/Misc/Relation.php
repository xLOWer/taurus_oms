<?php namespace Core\Misc
{
    use Core\Misc\RelationType;

    class Relation
    {
        public RelationType $Type;
        public string $Parent = '';             // имя класса родителя
        public string $Link = '';               // имя класса линка
        public string $ParentLinkId = '';     // через что коннектим в линк
        public string $LinkId = '';            // id в классе линка
        public string $ParentLinkEntity = ''; // поле в родителе к которому линкуем

        public function __construct(RelationType $Type = null,
            string $Parent = '',
            string $Link = '',
            string $ParentLinkId = '',
            string $LinkId = '',
            string $ParentLinkEntity = '')
        {
            $this->Type = $Type;
            $this->Parent = $Parent;
            $this->Link = $Link;
            $this->ParentLinkId = $ParentLinkId;
            $this->LinkId = $LinkId;
            $this->ParentLinkEntity = $ParentLinkEntity;

            return $this;
        }
        

    }
}

?>