<?php
DB::insert('UPDATE listings SET status = "r" WHERE property_id = (?)', [$input]);