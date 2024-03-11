<style>
.modal-body {
    width: 100%;
}

.container {
    border: 1px solid grey;
    height: auto;
    min-height: 200px;
    width: 1000px;
    display: flex;
    flex-wrap: wrap;
    gap: .5rem;
    padding: 1rem;
}

#checkbox-container {
    margin-bottom: 20px;
    display: grid;
    grid-template-rows: auto auto auto auto auto;
    gap: 2rem;
}

.selected-option {
    background-color: blue;
    height: fit-content;
    padding: .3rem;
    color: white;
    border-radius: 1rem;
    text-align: center;
}

.remove-option {
    cursor: pointer;
    color: blue;
    background-color: white;
    border-radius: 100%;
    border: none;
    margin-left: 4px;
}

.modal-box {
    padding: 1rem;
}

main {
    padding: 2rem;
}

.sidebar_name {
    display: grid;
    grid-template-columns: auto auto auto auto auto;
}
.hak_user_list{
    display: grid;
    grid-template-columns: auto auto auto auto auto;
}

.sidebar_name_children1{
    display: flex ;
    flex-direction: column;
    gap: 1rem;
}

</style>


<main>
    <div class="container" id="selected-options"></div>
    <div id="checkbox-container">
        <div class="sidebar_name">
            <div class="sidebar_name_children1">
                <div>INVENTORY</div>
                <div class="sidebar_name_children2">
                    <input type="checkbox" id="dashboard_inventory" value="dashboard_inventory" />
                    <label for="dashboard_inventory">Dashboard</label><br />
                    <input type="checkbox" id="pencarian_barang_inventory" value="pencarian_barang_inventory" />
                    <label for="pencarian_barang_inventory">Pencarian Barang</label><br />
                    <input type="checkbox" id="peringatan_stok_inventory" value="peringatan_stok_inventory" />
                    <label for="peringatan_stok_inventory">Peringatan Stok</label><br />
                    <input type="checkbox" id="tambah_barang_inventory" value="tambah_barang_inventory" />
                    <label for="tambah_barang_inventory">Tambah Barang Baru</label><br />
                    <input type="checkbox" id="barang_masuk_inventory" value="barang_masuk_inventory" />
                    <label for="barang_masuk_inventory">Barang Masuk</label><br />
                    <input type="checkbox" id="transfer_barang_inventory" value="transfer_barang_inventory" />
                    <label for="transfer_barang_inventory">Teransfer Barang</label><br />
                    <input type="checkbox" id="layout_rak_inventory" value="layot_rak_inventory" />
                    <label for="layout_rak_inventory">Layout Nomer Rak</label><br />
                    <input type="checkbox" id="master_barang_inventory" value="master_barang_inventory" />
                    <label for="master_barang_inventory">Master Barang</label><br />
                </div>
            </div>
            <div class="sidebar_name_children1">
                <div>TO DO LIST</div>
                <div>
                    <input type="checkbox" id="dashboard_inventory" value="dashboard_inventory" />
                    <label for="option1">Dashboard</label><br />
                    <input type="checkbox" id="pencarian_barang_inventory" value="pencarian_barang_inventory" />
                    <label for="option2">Pencarian Barang</label><br />
                </div>
            </div>
            <div class="sidebar_name_children1">
                <div>TO DO LIST</div>
                <div>
                    <input type="checkbox" id="dashboard_inventory" value="dashboard_inventory" />
                    <label for="option1">Dashboard</label><br />
                    <input type="checkbox" id="pencarian_barang_inventory" value="pencarian_barang_inventory" />
                    <label for="option2">Pencarian Barang</label><br />
                </div>
            </div>
            <div class="sidebar_name_children1">
                <div>TO DO LIST</div>
                <div>
                    <input type="checkbox" id="dashboard_inventory" value="dashboard_inventory" />
                    <label for="option1">Dashboard</label><br />
                    <input type="checkbox" id="pencarian_barang_inventory" value="pencarian_barang_inventory" />
                    <label for="option2">Pencarian Barang</label><br />
                </div>
            </div>
            <div class="sidebar_name_children1">
                <div>TO DO LIST</div>
                <div>
                    <input type="checkbox" id="dashboard_inventory" value="dashboard_inventory" />
                    <label for="option1">Dashboard</label><br />
                    <input type="checkbox" id="pencarian_barang_inventory" value="pencarian_barang_inventory" />
                    <label for="option2">Pencarian Barang</label><br />
                </div>
            </div>
        </div>
        <div class="hak_user_list">
            <div>
                <input type="checkbox" id="lihat_inventory" value="lihat_inventory" />
                <label for="lihat_inventory">Lihat</label><br />
                <input type="checkbox" id="tambah_inventory" value="tambah_inventory" />
                <label for="tambah_inventory">Tambah</label><br />
                <input type="checkbox" id="Ubah_inventory" value="ubah_inventory" />
                <label for="ubah_inventory">Ubah</label><br />
                <input type="checkbox" id="hapus_inventory" value="hapus_inventory" />
                <label for="hapus_inventory">Hapus</label><br />
            </div>
            <div>
                <input type="checkbox" id="option1" value="Option 1" />
                <label for="option1">Option 1</label><br />
                <input type="checkbox" id="option2" value="Option 2" />
                <label for="option2">Option 2</label><br />
                <input type="checkbox" id="option3" value="Option 3" />
                <label for="option3">Option 3</label><br />
            </div>
            <div>
                <input type="checkbox" id="option1" value="Option 1" />
                <label for="option1">Option 1</label><br />
                <input type="checkbox" id="option2" value="Option 2" />
                <label for="option2">Option 2</label><br />
                <input type="checkbox" id="option3" value="Option 3" />
                <label for="option3">Option 3</label><br />
            </div>
            <div>
                <input type="checkbox" id="option1" value="Option 1" />
                <label for="option1">Option 1</label><br />
                <input type="checkbox" id="option2" value="Option 2" />
                <label for="option2">Option 2</label><br />
                <input type="checkbox" id="option3" value="Option 3" />
                <label for="option3">Option 3</label><br />
            </div>
        </div>
    </div>

    <input type="hidden" id="selected-options-input" name="selectedOptions" />
    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
        <button type="submit" name="BtnSimpan" class="btn btn-primary">Tambah</button>
        </form>

    </div>

    <script type="text/javascript">
    function setTextField(ddl) {
        document.getElementById('master').value = ddl.options[ddl.selectedIndex].text;
    }
    </script>
    <script>
    const checkboxes = document.querySelectorAll(
        'input[type="checkbox"]'
    );
    const selectedOptionsDiv =
        document.getElementById("selected-options");
    const selectedOptionsForm = document.getElementById(
        "selected-options-form"
    );
    const selectedOptionsInput = document.getElementById(
        "selected-options-input"
    );

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", function() {
            let selected = [];
            checkboxes.forEach((cb) => {
                if (cb.checked) {
                    selected.push(cb.value);
                }
            });
            renderSelectedOptions(selected);
        });
    });

    function renderSelectedOptions(selected) {
        selectedOptionsDiv.innerHTML = "";
        selectedOptionsInput.value = selected.join(", ");

        selected.forEach((option) => {
            const optionDiv = document.createElement("div");
            optionDiv.classList.add("selected-option");
            optionDiv.textContent = option;

            const removeBtn = document.createElement("button");
            removeBtn.textContent = "x";
            removeBtn.classList.add("remove-option");
            removeBtn.addEventListener("click", function() {
                const index = selected.indexOf(option);
                if (index > -1) {
                    selected.splice(index, 1);
                    renderSelectedOptions(selected);
                }
            });

            optionDiv.appendChild(removeBtn);
            selectedOptionsDiv.appendChild(optionDiv);
        });

        if (selected.length === 0) {
            selectedOptionsDiv.textContent = "No options selected";
        }
    }
    </script>
</main>