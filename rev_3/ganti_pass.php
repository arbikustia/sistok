

        <h3 class="container px-4 mt-2 font-monospace fw-bold">Ganti Password</h3>
        <div class="container px-4 mt-2">
        <form action="pass.php" method="post">
        <div class="col-sm-4">
        <!-- <label for="exampleFormControlInput1" class="form-label">Nis</label> -->
        <input type="text" class="form-control" value="<?=$_SESSION['id']?>" id="exampleFormControlInput1" name="id" readonly>
        </div>
        <div class="col-sm-4">
        <label for="exampleFormControlInput1" class="form-label">Password Lama</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="pass">
        </div>
        <div class="col-sm-4">
        <label for="exampleFormControlTextarea1" class="form-label">Password Baru</label>
        <input class="form-control" type="password" name="password" id="exampleFormControlTextarea1"></input>
        </div>
        <button type="submit" name="BtnEdit" class="btn btn-success mt-2">Submit</button>
        </form>
        </div>