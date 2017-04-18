<?php $hour = 8; ?>
                <select name="time">
                    <?php for ($minute = 15; $minute <= $hour; $minute++): ?>
                        <option value="<?=$minute?>">
                            <?php 
                                if($minute<60) 
                                    echo $minute.' Mins'; 
                                else 
                                    echo ($minute/60).' hr'.($minute%60).' Mins';
                            ?> 
                        </option>
                    <?php endfor; ?>
                </select>


                <?php for ($year=1900; $year <= 2015; $year++): ?>
                  <option value="<?=$year;?>"><?=$year;?></option>
                <?php endfor; ?>