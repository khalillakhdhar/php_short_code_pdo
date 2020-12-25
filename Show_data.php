<?php
include("imports.php");
include("nav.php");

include("./models/crud_user.php");
$us = new User();
$liste = $us->list();
?>
                            <table >
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>email</th>
                                        <th>tel</th>
                                        <th>Adresse</th>
                                        <th class="text-center">etat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                              <tbody>
                                <?php
                                  while ($row = $liste->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?= $row["nom"] ?></td>
                                        <td><?= $row["email"] ?></td>
                                        <td><?= $row["telephone"] ?></td>
                                        <td><?= $row["adresse"] ?></td>
                                       
                                        <td class="text-center"> <a href="./controllers/ClientController.php?id=<?=$row["id"]?>&type=client" class="btn btn-danger">supprimer</a> </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>email</th>
                                        <th>tel</th>
                                        <th>Adresse</th>
                                        <th class="text-center">etat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                  
