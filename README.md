# PHP Task

Run server

	php -S localhost:8000 -t public/


1. Implement a comment system – a form, that allows you to submit comments, save them in the DB, and display the comments.

2. Implement an event manager class. It should implement the singleton pattern, and support pluggable observers. The class will allow you to subscribe to events, fire events, and when the events are fired – call the appropriate callbacks.

3. Create a DB table that will hold a list of observers, and will initialize them one by one.

4. Implement an 'onSubmit' event for the comment submission.

5. Write an observer, that subscribes to the 'onSubmit' event for the comment, fires on the submission of a new comment, and replaces all smileys with corresponding images of the smileys.

6. All code should be covered with PHPDoc, and unit tests, including the event manager, the observer, and any other code.

Keep in mind, that usage of pre-existing frameworks is forbidden. Try to keep the code PEAR styled. All DBcode should be in a .sql file attached. The implementation and usage of additional observers, events and design patterns is encouraged. Also, please attach a README file, with explanations as to how to run the
