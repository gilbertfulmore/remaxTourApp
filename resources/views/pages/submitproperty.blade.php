@extends('app')

@section('title')Realty Tour App @stop

@section('body')

    <?php echo $agent_id; ?>

            <div id='contentnav'>Submit New Property</div>
            <div id='contentblock'>
                <p>
                    <form method='post' action='submit'>
                        <input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'>
                        <input type='hidden' name='agent_id' value='<?php echo $agent_id; ?>'>
                        <p>ID: <br/>
                        <input type='number' name='sub_ID' id='formstyle'/></p>
                        <p>Address: <br/>
                        <input type='text' name='sub_add' id='formstyle'/> </p>
                        <p>MLS: <br/>
                        <input type='text' name='sub_mls' id='formstyle'/> </p>
                        <p>Square Footage: <br/>
                        <input type='text' name='sub_sqr' id='formstyle'/> </p>
                        <p>Sub-area: <br/>
                        <select name='sub_dist' id='formstyle'>
                            <option value='BW'>Big White</option>
                            <option value='BL'>Black Mountain</option>
                            <option value='BE'>Beaverdell-Carmi</option>
                        </select></p>
                        <p><input type='submit' name='submit_prop' value='Submit' id='formstyle'/></p>
                    </form>
                </p>
            </div>



@stop
