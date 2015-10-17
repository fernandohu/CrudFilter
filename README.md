# CrudFilter
Use this project to create filters for a CRUD listing page.

The reason this library exist:
* You want to keep the code simple and like the idea of standardizing the way forms are created.
* You want reusable code, that can be used in many CRUD implementations.  
* You want something convenient and user friendly, so customers are happy to use.

# Main features
* Automatic SQL generation: WHERE part only obviously, with or without parameter binding
* Detection of request values: form fields are automatically filled with information read from GET or POST parameters
* HTML generation: generated HTML tags and CSS classes are Twitter Bootstrap conforming 
* Multiple parameter binding styles: it can generate SQL code with different styles, like Direct, PDO, MysqlI, Phalcon and many others
* Multiple form field implementations: Textedit, Selectbox
* Placeholder setter: description that appears inside the form field when the value is blank
* Legend setter: description that appears below the form field
* Label setter: description that appears in the left side of the form field 
* Column size setter:  possibility to specify label and field column sizes
* Internationalization: all texts can be translated to your language 
* Reset button: use it to revert form fields to their original values
