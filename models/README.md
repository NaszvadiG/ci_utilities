# Models

## Shared Model ##

Model for transversal works between the different tables.

**use**

    // In your controller

    $this->load->database();

    $this->load->model('shared_model', 'Cars');
    $this->Cars->set_table('cars');
    $this->Cars->set_pk('id');

    $this->load->model('shared_model', 'People');
    $this->People->set_table('people');
    $this->People->set_pk('id');

    $this->Cars->new_record(['name' => 'My Car']);
    $this->Cars->get_all();
    $this->Cars->find(1);
    $this->Cars->update_record(1, ['name' => 'My Second Car']);
    $this->Cars->delete_record(2);
    $this->Cars->get_with_offset(40, 1);
    $this->Cars->count_records();
    $this->Cars->get_between_id([2, 6]);
    $this->Cars->empty_table();
    $this->Cars->truncate_table();

<br><br>
