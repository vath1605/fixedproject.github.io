    <?php include('includes/header.php');
    include('../func/getProduct.php');
    ?>
    <div class="container-fluid">
        <div class="row px-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h2>Categories List</h2>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $categories = getAll("categories");
                        if (mysqli_num_rows($categories) > 0) {
                            foreach ($categories as $item) {
                        ?>
                                <tr>
                                    <td><?= $item['id']; ?></td>
                                    <td><?= $item['name']; ?></td>
                                    <td><img style="width: 50px; object-fit: cover; height:50px; padding: 1px;" class="rounded-circle border <?= $item['status']=='1' ? "border-success":"border-danger";?> shadow-blur shadow" src="../uploads/<?=$item['image']; ?>" alt=" <?= $item['name']; ?>"></td>
                                    <td><div style="font-size: 11px;" class="py-1 text-center text-light fw-bold w-25 rounded-pill <?= $item['status']=='1' ? "bg-success":"bg-secondary"; ?>"><?= $item['status']=='1' ? "Visible":"Hidden"; ?></div></td>
                                    <td><?= $item['create_at']; ?></td>
                                    <td><a href="edit-cate.php?id=<?= $item['id']; ?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg> Edit</a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>
    <script>
        $(function(){
            $('.table').DataTable();
        })
    </script>
