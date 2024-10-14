<?php
// require_once __DIR__.'/AbstractBookTypeRepository.php';

class FileBookTypeRepository implements BookTypeRepositoryInterface
{
    private string $filePath;
    public function __construct(Config $config)
    {
        $this->filePath = $config->get('BOOK_TYPE_REPOSITORY_PATH', __DIR__ . '/../../data/book_types.json');
    }

    public function all(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = json_decode(file_get_contents($this->filePath), true);
        $bookTypes = [];
        if ($data === null) {
            return [];
        }

        foreach ($data as $typeData) {
            $bookType = new BookType($typeData['name']);
            $bookType->setId($typeData['id']);
            $bookTypes[] = $bookType;
        }
        return $bookTypes;
    }

    public function save(BookType $bookType):void{
        $types = json_decode(file_get_contents($this->filePath),true) ?? [];
        $bookType->setId(count($types)+1);
        $types[]=[
            'id'=>$bookType->getId(),
            'name'=>$bookType->getName(),
        ];
        file_put_contents($this->filePath,json_encode($types,JSON_PRETTY_PRINT));
    }
}
