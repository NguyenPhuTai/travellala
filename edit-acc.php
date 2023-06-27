<?php foreach ($airport as $key) { ?>
                  <tr>
                    <td><?php echo $key['id_airport']; ?></td>
                    <td><?php echo $key['name_airport']; ?></td>
                    <td><?php echo $key['city']; ?></td>
                    <td><?php echo $key['code_airport']; ?></td>
                  </tr>
                <?php }
                break; ?>