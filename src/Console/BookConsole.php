<?php

namespace Ytake\Laravel\SampleConsole\Console;

use Illuminate\Console\Command;
use Ytake\Laravel\SampleConsole\DataStorage\Book;
use Symfony\Component\Console\Helper\FormatterHelper;

/**
 * Class BookConsole
 * シンプルな書籍データを表示するコンソールです
 */
class BookConsole extends Command
{
    /** @var string */
    protected $name = 'book:information';

    /** @var string  */
    protected $description = 'laravel reference book(jp) information';

    /**
     * @param Book $book
     */
    public function handle(Book $book)
    {
        $result = $book->getData();

        $formatHelper = new FormatterHelper();
        $formattedLine = $formatHelper->formatSection(
            'authors',
            implode(', ', $result['authors'])
        );
        $this->output->writeln($formattedLine);
        $this->output->writeln("<fg=cyan;bg=black>{$result['title']}</> <fg=yellow;bg=black>{$result['sub_title']}</>");
        $this->table($result['chapters'], $result['contents']);

        $this->error("JPY " . number_format("{$result['price']}", 2));
    }
}
