<?php
declare(strict_types=1);

namespace Nwilging\LaravelStrictValidationTests\Unit;

use Nwilging\LaravelStrictValidation\StrictTypesValidator;
use Nwilging\LaravelStrictValidationTests\TestCase;

class StrictTypesValidatorTest extends TestCase
{
    /**
     * @dataProvider validatorDataProvider
     */
    public function testValidate($attribute, $value, array $parameters, bool $expectedResult)
    {
        $validator = new StrictTypesValidator();
        $result = $validator->validate($attribute, $value, $parameters);

        $this->assertSame($expectedResult, $result);
    }

    public function validatorDataProvider(): array
    {
        return [
            'validation passes - string' => [
                'attribute' => 'test',
                'value' => 'value',
                'parameters' => [
                    'string'
                ],
                true,
            ],
            'validation passes - integer as int type' => [
                'attribute' => 'test',
                'value' => 42,
                'parameters' => [
                    'int'
                ],
                true,
            ],
            'validation passes - integer as native type string' => [
                'attribute' => 'test',
                'value' => 42,
                'parameters' => [
                    'integer'
                ],
                true,
            ],
            'validation passes - double as float type' => [
                'attribute' => 'test',
                'value' => 1.56,
                'parameters' => [
                    'float'
                ],
                true,
            ],
            'validation passes - double as native type string' => [
                'attribute' => 'test',
                'value' => 1.56,
                'parameters' => [
                    'double'
                ],
                true,
            ],
            'validation passes - boolean as bool type' => [
                'attribute' => 'test',
                'value' => false,
                'parameters' => [
                    'bool'
                ],
                true,
            ],
            'validation passes - boolean as native type string' => [
                'attribute' => 'test',
                'value' => true,
                'parameters' => [
                    'boolean'
                ],
                true,
            ],
            'validation fails - string required as int' => [
                'attribute' => 'test',
                'value' => '5',
                'parameters' => [
                    'int',
                ],
                false,
            ],
            'validation fails - string required as float' => [
                'attribute' => 'test',
                'value' => '5.5',
                'parameters' => [
                    'float',
                ],
                false,
            ],
            'validation fails - int required as float' => [
                'attribute' => 'test',
                'value' => 5,
                'parameters' => [
                    'float',
                ],
                false,
            ],
            'validation fails - float required as int' => [
                'attribute' => 'test',
                'value' => 5.5,
                'parameters' => [
                    'int',
                ],
                false,
            ],
            'validation fails - string required as bool' => [
                'attribute' => 'test',
                'value' => 'true',
                'parameters' => [
                    'bool'
                ],
                false,
            ],
            'validation fails - int required as bool' => [
                'attribute' => 'test',
                'value' => 1,
                'parameters' => [
                    'bool'
                ],
                false,
            ],
        ];
    }
}
