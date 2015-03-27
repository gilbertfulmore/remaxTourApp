<?php
DB::insert('UPDATE listings SET status = "s" WHERE property_id = (?)', [$input]);