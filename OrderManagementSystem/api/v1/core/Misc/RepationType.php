<?php 
namespace Core\Misc
{
    enum RelationType
    {
        case OneToOne;
        case ManyToOne;
        case OneToMany;
        case ManyToMany;
    }
}
?>