<?php
DB::insert('UPDATE listings SET status = "S" WHERE property_id = (?)', [$input]);
