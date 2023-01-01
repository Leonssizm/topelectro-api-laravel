These Fakers add additional custom properties to fakers that we use in factories.

How to add new custom properties:

#1. create new Faker class. For Example: `database/factories/fakers/ProductFaker.php`.
#2. add public method(s) in that class. For Example:

```php
public function SQ(): string
{
     // return random string like: 0012-5592
}
```

#3. Register the class in the `app/Providers/FakerServiceProvider.php`. by using addProvider() method.
#4. Thats it. now you can access your property like this $this->faker->SQ. Enjoy!
