<?php
function sortTree($model, $iterA, $iterB)
{
	$column = $model->get_sort_column_id();
}

// Create a tree store.
$treeStore = new GtkTreeStore(Gtk::TYPE_STRING, Gtk::TYPE_LONG, Gtk::TYPE_DOUBLE);

// Add some top level product data.
$csMerch     = $treeStore->append(null, array('Crisscott', null, null));
$phpGtkMerch = $treeStore->append(null, array('PHP-GTK',   null, null));

$tShirts = $treeStore->append($csMerch, array('T-Shirts', 10, 19.95));
$treeStore->append($tShirts, array('Small',  3, 19.95));
$treeStore->append($tShirts, array('Medium', 5, 19.95));
$treeStore->append($tShirts, array('Large',  2, 19.95));

$pencils = $treeStore->append($csMerch, array(' Pencils', 18, .99));
$treeStore->append($pencils, array('Blue', 9, .99));
$treeStore->append($pencils, array('White', 9, .99));

$treeStore->append($phpGtkMerch, array('PHP-GTK Bumper Stickers', 37, 1.99));
$treeStore->append($phpGtkMerch, array('Pro PHP-GTK',             23, 44.95));

// Create one sortable tree.
$sortable = new GtkTreeModelSort($treeStore);
$sortable->set_sort_column_id(0, Gtk::SORT_DESCENDING);

// Create the other sortable tree.
$sortable2 = new GtkTreeModelSort($treeStore);
$sortable2->set_sort_column_id(2, Gtk::SORT_ASCENDING);

// Create a veiw to show the tree.
$view = new GtkTreeView();
$view->set_model($sortable);

// Create columns for each type of data.
$column = new GtkTreeViewColumn();
$column->set_title('Product Name');
$view->insert_column($column, 0);
// Create a renderer for the column.
$cell_renderer = new GtkCellRendererText();
$column->pack_start($cell_renderer, true);
$column->set_attributes($cell_renderer, 'text', 0);

// Create columns for each type of data.
$column = new GtkTreeViewColumn();
$column->set_title('Inventory');
$view->insert_column($column, 1);
// Create a renderer for the column.
$cell_renderer = new GtkCellRendererText();
$column->pack_start($cell_renderer, true);
$column->set_attributes($cell_renderer, 'text', 1);

// Create columns for each type of data.
$column = new GtkTreeViewColumn();
$column->set_title('Price');
$view->insert_column($column, 2);
// Create a renderer for the column.
$cell_renderer = new GtkCellRendererText();
$column->pack_start($cell_renderer, true);
$column->set_attributes($cell_renderer, 'text', 2);

// Create a veiw to show the tree.
$view2 = new GtkTreeView();
$view2->set_model($sortable2);

// Create columns for each type of data.
$column = new GtkTreeViewColumn();
$column->set_title('Product Name');
$view2->insert_column($column, 0);
// Create a renderer for the column.
$cell_renderer = new GtkCellRendererText();
$column->pack_start($cell_renderer, true);
$column->set_attributes($cell_renderer, 'text', 0);

// Create columns for each type of data.
$column = new GtkTreeViewColumn();
$column->set_title('Inventory');
$view2->insert_column($column, 1);
// Create a renderer for the column.
$cell_renderer = new GtkCellRendererText();
$column->pack_start($cell_renderer, true);
$column->set_attributes($cell_renderer, 'text', 1);

// Create columns for each type of data.
$column = new GtkTreeViewColumn();
$column->set_title('Price');
$view2->insert_column($column, 2);
// Create a renderer for the column.
$cell_renderer = new GtkCellRendererText();
$column->pack_start($cell_renderer, true);
$column->set_attributes($cell_renderer, 'text', 2);

// Create a window and show everything.
$window = new GtkWindow();
$hBox   = new GtkHBox();

$window->add($hBox);
$hBox->pack_start($view);
$hBox->pack_start($view2);

$window->show_all();
$window->connect_simple('destroy', array('Gtk', 'main_quit'));
Gtk::main();

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 */
?>
