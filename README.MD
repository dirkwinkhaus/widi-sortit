# Widi-SortIt
With SortIt can sort arrays of objects and arrays of arrays over criterias.
# Demo
    <?php
    
    use JMS\Serializer\SerializerBuilder;
    use Widi\SortIt\Factory\SortManFactory;
    use Widi\SortIt\MyObject;
    use Widi\SortIt\MyType;
    use Widi\SortIt\Option\Ascending;
    use Widi\SortIt\SortCriteria;
    
    require_once '../vendor/autoload.php';
    
    $myTypeA = new MyType('A');
    $myTypeB = new MyType('B');
    $myTypeC = new MyType('C');
    
    $arrayOfObjects = [
        new MyObject('1', 6, 'AA', $myTypeC),
        new MyObject('2', 5, 'BB', $myTypeB),
        new MyObject('3', 5, 'AB', $myTypeB),
        new MyObject('4', 5, 'AB', $myTypeA),
        new MyObject('5', 3, 'BA', $myTypeA),
        new MyObject('6', 2, 'CC', $myTypeB),
        new MyObject('7', 1, 'DD', $myTypeC),
    
    ];
    
    
    $criteriaA = new SortCriteria(
        'value',
        new Ascending()
    );
    
    $criteriaB = new SortCriteria(
        'label',
        new Ascending()
    );
    
    $criteriaC = new SortCriteria(
        'type.name',
        new Ascending()
    );
    
    $sortManFactory = new SortManFactory(new SerializerBuilder());
    $sortMan        = $sortManFactory->create();
    
    $sortMan->registerCriteria($criteriaA);
    $sortMan->registerCriteria($criteriaB);
    $sortMan->registerCriteria($criteriaC);
    
    $result = $sortMan->sort($arrayOfObjects);
    
    /** @var MyObject $item */
    foreach ($result as $item) {
        echo $item->getName() . ' ' . $item->getValue() . ' ' . $item->getLabel() . ' ' . $item->getType()->getName() . PHP_EOL;
    }
## Object in list
    <?php
    
    namespace Widi\SortIt;
    
    /**
     * Class MyObject
     * @package Widi\SortIt
     */
    class MyObject
    {
        /**
         * @var int
         */
        private $value;
    
        /**
         * @var string
         */
        private $label;
    
        /**
         * @var MyType
         */
        private $type;
        /**
         * @var string
         */
        private $name;
    
        /**
         * MyObject constructor.
         * @param string $name
         * @param int $value
         * @param string $label
         * @param MyType $type
         */
        public function __construct(string $name, int $value, string $label, MyType $type)
        {
            $this->value = $value;
            $this->label = $label;
            $this->type  = $type;
            $this->name  = $name;
        }
    
        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }
    
        /**
         * @return int
         */
        public function getValue(): int
        {
            return $this->value;
        }
    
        /**
         * @return string
         */
        public function getLabel(): string
        {
            return $this->label;
        }
    
        /**
         * @return MyType
         */
        public function getType(): MyType
        {
            return $this->type;
        }
    }
## Sub class of object
    <?php
    
    namespace Widi\SortIt;
    
    /**
     * Class MyType
     * @package Widi\SortIt
     */
    class MyType
    {
        /**
         * @var string
         */
        private $name;
    
        /**
         * MyType constructor.
         * @param string $name
         */
        public function __construct(string $name)
        {
            $this->name = $name;
        }
    
        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }
    }