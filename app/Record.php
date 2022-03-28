<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected  $fillable = ['name','data_info','case_sensitive','separated','single_line_comment','multiline_comment_begin','multiline_comment_end','data_types_before_text','data_types','data_types_after_text','addition','subtraction','multiplication','division','division_whole','remainder_of_the_division','increase','decrease','equally','not_equal','more','less','more_or_equal','less_or_equal','and_main','or_main','not_main','and_alt','or_alt','not_alt','assignment','increasing_specified','reducing_specified','multiply_specified','dividing_specified','dividing_whole_specified','remainder_of_dividing_specified','input','print','if_','conditions','begin_','_end','_elseif_','_else','shortif','operators','switch_','expressions','case_','const','_break','default_','for_','for_condition','while_do','do_','do_while'];
}
