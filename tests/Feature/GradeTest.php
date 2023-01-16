<?php

namespace Tests\Feature;

use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GradeTest extends TestCase
{
    use RefreshDatabase;
    //Test that a grade can be added to the database
    public function test_a_grade_can_be_added_to_the_database()
    {
        //Grade::truncate();

        //Send a valid post request
        $this->postJson('/api/grade/store', [
            'grade_number' => 1,
            'grade_suffix' => 'A'
        ]);

        //Ensure that the record was stored on the database
        $this->assertCount(1, Grade::all());
    }

    //Test the validation rules for Grades
    public function test_validation_rules_work()
    {
        //Grade::truncate();

        //Send a post request without any data
        $response = $this->postJson('/api/grade/store');

        $response->assertInvalid([
            'grade_number',
            'grade_suffix'
        ]);
    }

    //Test that a Grade can be updated
    public function test_that_a_grade_can_be_updated()
    {
        //Create a new Grade using the factory
        $grade = Grade::factory()->create([
            'grade_number' => 1,
            'grade_suffix' => 'A'
        ]);

        //Verify that the Grade was created ]
        $this->assertCount(1, Grade::all());

        //Get the id of the last created Grade
        $last_grade_id = $grade->id;

        //Update the Grade suffix to C
        $updatedGrade = $this->patchJson('/api/grade/update/'.$last_grade_id, [
            'grade_suffix' => 'C'
        ]);

        // dd(Grade::where('id', $last_grade_id)->get());
        $updatedGrade->assertOk();
    }

    //Test that all Grades can be fetched from the database
    public function test_all_grades_can_be_fetched_from_the_database()
    {
        //Grade::truncate();

        //Create 15 Grades (Pagination);
        Grade::factory(15)->create();

        //Ensure that exactly 15 Grades were created
        $this->assertCount(15, Grade::all());

        //Fetch all the Grades from the database
        $grades = $this->getJson('/api/grade/index');
        
        //Ensure that exactly 15 Grades were fetched from the database
        $grades->assertJsonCount(15, 'data');
    }

    public function test_that_a_grade_with_a_given_id_can_be_fetched_from_the_database()
    {
        //Create 10 Grades
        Grade::factory(10)->create();

        //Create the 11th Grade
        $last_grade = Grade::factory()->create([
            'grade_number' => 11,
            'grade_suffix' => 'A'
        ]);

        //Retrieve the 11th Grade from the database using the id of the last inserted grade
        $grade = $this->getJson('/api/grade/show/'.$last_grade->id);

        $grade->assertJson([
            'grade_number' => 11,
            'grade_suffix' => 'A'
        ]);
    }

    //Test that no Grade is returned when an invalid id is provided
    public function test_that_a_no_grade_is_returned_when_an_invalid_id_is_provided()
    {
        //Grade::truncate();

        //Create 10 Grades
        Grade::factory(10)->create();


        //Try to retrieve the 11th Grade from the database
        $grade = $this->getJson('/api/grade/show/11');

        //Assert not found
        $grade->assertNotFound();
    }

    //Test that a Grade can be deleted from the database

    public function test_a_grade_can_be_deleted_from_the_database()
    {
        //Grade::truncate();

        //Create 1 Grade
        $grade = Grade::factory()->create();

        //Assert that the Grade was created
        $this->assertCount(1, Grade::all());

        //Delete the Grade using the id of the last created record
        $this->deleteJson('/api/grade/destroy/'.$grade->id);

        //Assert that there are no Grades left in the database
        $this->assertCount(0, Grade::all());
    }
}
