$(document).ready(function () {

    // are you sure to delete
    $(".btn-danger").click(function (event) {
        if (!confirm("Are you sure?")) {
            // Prevent default behavior of the button if user clicks "Cancel"
            event.preventDefault();
            return;
        }
    });



    // insert product row
    $manageProductTable = $("#manage-product .table-data");
    $manageProductTableBtn = $("#manage-product .btn.addItem");
    $manageProductItems = $("#manage-product .table-data tr[data-id]").length;
    $manageProductTableBtn.on("click", function () {
        $manageProductItems++;
        var html =
            `<tr data-id="${$manageProductItems}">
                <td>
                    <input type="number" value="${$manageProductItems}" readonly name="id-${$manageProductItems}">
                </td>
                <td>
                    <input type="text" value="" name="name-${$manageProductItems}">
                </td>
                <td>
                    <select name="brand-${$manageProductItems}">
                        <option value="1">Samsung</option>
                        <option value="2">Redmi</option>
                        <option value="3">Apple</option>
                        <option value="4">Oppo</option>
                        <option value="5">Nokia</option>
                    </select>
                </td>
                <td>
                    <input type="text" value="" disabled name="origin-${$manageProductItems}">
                </td>
                <td>
                    <input type="number" step="10" value="0.00" name="price-${$manageProductItems}">
                </td>
                <td>
                    <div class="preview-image">
                        <img src="#" alt="preview">
                        <input type="file" name="image-${$manageProductItems}" accept="image/*">
                    </div>
                </td>
                <td>
                    <button type="submit" name="manage-insert" formaction="manage.php?id=${$manageProductItems}"
                        class="btn btn-success">Insert</button>
                </td>
                <td>
                    <button type="submit" name="manage-delete" formaction="manage.php?id=${$manageProductItems}"
                        class="btn btn-danger">Delete</button>
                </td>
            </tr>`;

        $manageProductRow = $("#manage-product .table-data tbody").get(0).insertRow(-1);
        $manageProductRow.innerHTML = html;
    });

    // insert product row
$accMemberTable = $("#account-member .table-data");
$accMemberTableBtn = $("#account-member .btn.addItem");
$accMemberItems = $("#account-member .table-data tr[data-id]").length;
console.log("accMemberItems" + $accMemberItems);
$accMemberTableBtn.on("click", function () {
    $accMemberItems++;
    console.log($accMemberItems);
    var html =
        `<tr data-id="${$accMemberItems}">
            <td>
                <input type="number" value="${$accMemberItems}" readonly name="id-${$accMemberItems}">
            </td>
            <td>
                <input type="text" value="" name="username-${$accMemberItems}" class="text-center">
            </td>

            <td> 
                <input type="text" value="" name="password-${$accMemberItems}" class="text-center">
            </td>
            <td>
                <select name="privilege-${$accMemberItems}">
                    <option value="1">Admin</option>
                    <option value="0" selected>User</option>
                </select>
            </td>
            <td>
                <button type="submit" name="account-insert" formaction="account.php?id=${$accMemberItems}"
                    class="btn btn-success">Insert</button>
            </td>
            <td>
                <button type="submit" name="account-delete" formaction="account.php?id=${$accMemberItems}"
                    class="btn btn-danger">Delete</button>
            </td>
        </tr>`;
    $accMemberRow = $("#account-member .table-data tbody").get(0).insertRow(-1);
    $accMemberRow.innerHTML = html;
});
$catTable = $("#categorie .table-data");
$catTableBtn = $("#categorie .btn.addItem");
$catItems = $("#categorie .table-data tr[data-id]").length;
console.log("catItems" + $catItems);
$catTableBtn.on("click", function () {
    $catItems++;
    console.log($catItems);
    var html =
        `<tr data-id="${$catItems}">
            <td>
                <input type="number" value="${$catItems}" readonly name="id-${$catItems}">
            </td>
            <td>
                <input type="text" value="" name="brand-${$catItems}" class="text-center">
            </td>

            <td> 
                <input type="text" value="" name="company-${$catItems}" class="text-center">
            </td>
            <td>
                <button type="submit" name="cat-insert" formaction="categorie.php?id=${$catItems}"
                    class="btn btn-success">Insert</button>
            </td>
            <td>
                <button type="submit" name="cat-delete" formaction="categorie.php?id=${$catItems}"
                    class="btn btn-danger">Delete</button>
            </td>
        </tr>`;
    $catRow = $("#categorie .table-data tbody").get(0).insertRow(-1);
    $catRow.innerHTML = html;
});
});