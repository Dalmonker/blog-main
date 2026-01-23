<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php include_once 'templates/header.php'; ?>
    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <a href="/?act=login">
                    <button type="button" class="btn btn-success add-article">Login</button>
                </a>
                <a href="/?act=register">
                    <button type="button" class="btn btn-primary add-article">Register</button>
                </a>
                <a href="">
                    <button type="button" class="btn btn-dark add-article">All blogs</button>
                </a>
                <div class="row">
                    <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card box-shadow">
                                <img class="card-img-top" src="" alt="">
                                <div class="card-body">
                                    <p class="card-text"> <?= $row['title'] ?> </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-secondary">View</button>
                                            <?php if ($user && $row['userId'] == $user['id']): ?>
                                                <a href="/?act=edit&id=<?= $row['id'] ?>">
                                                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>