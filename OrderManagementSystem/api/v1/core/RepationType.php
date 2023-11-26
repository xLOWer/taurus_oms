<?php namespace TaurusOmsApi
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