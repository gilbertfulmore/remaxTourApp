<?php
DB::insert('UPDATE listings SET status = "R" WHERE property_id = (?)', [$input]);
