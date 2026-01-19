
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<main role="main">
    <?php require "templates/index.php"; ?>
    <div class="album py-5 bg-light">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created at</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['createdAt'] ?></td>
                        <td>
                            <a href="/?act=edit&id=<?=$row['id']?>">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                            <a href="/?act=delete&id=<?=$row['id']?>">
                                <button type="button" class="btn btn-primary">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</main>