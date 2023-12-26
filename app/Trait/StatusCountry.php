<?php

namespace App\Trait;

trait StatusCountry
{
    public function status_value()
    {
        return $this->status == 1 ? 'مفعل' : "غير مفعل";
    }

    public function status_color()
    {
        return $this->status == 1 ? 'btn btn-primary btn-sm' : "btn btn-danger btn-sm";
    }
}
