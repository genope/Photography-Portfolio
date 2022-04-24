<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-uppercase">Ajuter Produit</div>
            <div class="card-body">

                <form action = "" method="post">


                    <div class="form-group row">
                        <label for="categorie_id" class="col-sm-3 col-form-label">Categorie</label>
                        <div class="col-sm-9">
                            <select id="categorie_id" name="categorie_id" class="form-control" required>
                                <option value="">Choix Catégorie</option>
                                <?php foreach($categories as $categorie){ ?>
                                    <option value="<?php echo $categorie['categorie_id']; ?>"><?php echo ucfirst($categorie['libelle']); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="titre" class="col-sm-3 col-form-label">Titre</label>
                        <div class="col-sm-9">
                            <input type="text" id="titre" name="titre" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="prix" class="col-sm-3 col-form-label">Prix</label>
                        <div class="col-sm-9">
                            <input type="number" step="any" id="prix" name="prix" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <input type="file" id="image" name="image" class="form-control" >
                        </div>
                    </div>





                    <div class="form-group row">
                        <label for="input-1" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" name="add" class="btn btn-primary shadow-primary px-5"><i class="fa fa-save"></i> ADD</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div><!--End Row-->