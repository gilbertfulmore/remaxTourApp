@extends('app')

@section('title')Realty Tour App @stop

@section('body')

    <div class='contentheader'>Submit New Property</div>
    <div class='contentblock'>
        <p>
            <form method='post' action='submit'>
                <input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'>
                <input type='hidden' name='agent_id' value='<?php echo $agent_id; ?>'>
                <div class="formcontainer">Address: <br/>
                    <input type='text' name='sub_add' id='formstyle'/>
                </div>
                <div class="formcontainer">MLS: <br/>
                    <input type='text' name='sub_mls' id='formstyle'/>
                </div>
                <div class="formcontainer">Square Footage: <br/>
                    <input type='text' name='sub_sqr' id='formstyle'/>
                </div>
                <div class="formcontainer">Sub-area: <br/>
                    <select name='sub_dist' id='formstyle'>
                        <option value='LCU'>Winfield, Ellison, Lake Country, Quail</option>
                        <option value='KNG'>Dilworth, Glenmore, North Glenmore, Kelowna North</option>
                        <option value='KSM'>Sprintfield, Spall, Mission, Southeast Kelowna, Kelowna South</option>
                        <option value='WK'>Westside</option>
                        <option value='RNS'>Rutland, Black Mountain, Joe Rich</option>
                    </select>
                </div>
                <div style='clear:both; margin: 10px;'><input type='submit' name='submit_prop' value='Submit' id='formstyle'/></div>
            </form>
        </p>
    </div>
@stop
