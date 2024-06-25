<main class="container">
    <div class="main_header mt-3 ms-3">
        <a href="?b=Admin&s=delegates"><i class="fas fa-circle-chevron-left"></i></a>
    </div>
    <div class="main_body position-relative">
        <div class="row">
            <div class="col text-center">
                <div class="log_porf">
                    <i class="fa-solid fa-user-nurse"></i>
                </div>
                <p><b>Enfermeria</b></p>
            </div>
            <div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre de usuario</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Email institucional</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)) : ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user['user_del']); ?></td>
                                        <td><?php echo htmlspecialchars($user['name_del']); ?></td>
                                        <td><?php echo htmlspecialchars($user['apelli_del']); ?></td>
                                        <td><?php echo htmlspecialchars($user['tel_del']); ?></td>
                                        <td><?php echo htmlspecialchars($user['email_del']); ?></td>
                                        <td><?php echo htmlspecialchars($user['email_inst_del']); ?></td>
                                        <td><a href="?b=admin&s=edit&id=<?php echo $user['user_del']; ?>" class="link-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        <td><a href="#"onclick="opendelModal()=<?php echo $user['user_del']; ?>" class="link-danger delete-link"><i class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8">No hay usuarios disponibles.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</main>

    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminar Usuario</h5>
                </div>
                <div class="modal-body text-center">
                    <p>¿Estás seguro de que quieres eliminar este usuario?</p>
                    <form method="get" action="">
                        <input type="hidden" name="b" value="admin">
                        <input type="hidden" name="s" value="deleteUser">
                        <button type="submit" class="btn btn-success" id="confirmButton">Aceptar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal()">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="assets/js/delete.js"></script>
