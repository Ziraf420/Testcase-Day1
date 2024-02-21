<?php
namespace Unit\models;

use app\models\SubscribeForm;
use app\models\Subscriber;
use \UnitTester;

class SubscriberTest extends \Codeception\Test\Unit
{
    // Test untuk memvalidasi variabel saat membuat subscriber
    public function testCreate()
    {
        $this->model = new Subscriber([
            'TransactionTime' => '',
            'Interface' => '',
            'Nationality' => '',
            'IDNumber' => '',
            'FullName' => '',
            'DateofBirth' => '',
            'Gender' => '',
            'Address' => '',
            'SIMType' => '',
            'MSISDN' => '',
            'DealerID' => '',
        ]);
        verify($this->model->save())->false();
        $errors=[
            'TransactionTime'=>'a'
        ];
        verify($errors)->arrayContains($this->model->getErrors());
        print_r($this->model->getErrors());
        die();
    }

    // Test untuk memvalidasi variabel saat memperbarui subscriber
    public function testUpdate()
    {
        // Ambil ID subscriber secara acak
        $randomId = Subscriber::find()
            ->select('id')
            ->orderBy('rand()')
            ->limit(1)
            ->scalar();

        // Pastikan ID subscriber acak berhasil diambil
        $this->assertNotNull($randomId, "Random subscriber ID not found");

        // Cari subscriber dengan ID acak
        $subscriberToUpdate = Subscriber::findOne($randomId);

        // Pastikan subscriber ditemukan
        $this->assertNotNull($subscriberToUpdate, "Subscriber with ID $randomId not found");

        // Tentukan data yang akan diupdate
        $updatedData = [
            'TransactionTime' => '2023-06-18 17:30:00',
            'Interface' => 'API',
            'Nationality' => 'Indonesia',
            'IDNumber' => '1234567890',
            'FullName' => 'John Doe',
            'DateofBirth' => '1990-01-01',
            'Gender' => 'Laki-laki',
            'Address' => 'Jalan Raya No. 123',
            'SIMType' => 'Prepaid',
            'MSISDN' => '+6281234567890',
            'DealerID' => 123,
        ];

        // Validasi MSISDN hanya menggunakan angka 62 atau 0
        if (!preg_match('/^(?:62|0)[0-9]{9}$/', $updatedData['MSISDN'])) {
            $errors['MSISDN'][] = 'Hanya digunakan nomor telepon mulai dengan 62 atau 0';
        }

        // Update atribut model subscriber dengan data yang baru
        foreach ($updatedData as $attribute => $value) {
            $subscriberToUpdate->$attribute = $value;
        }

        // Simpan subscriber yang telah diupdate dan kembalikan true jika berhasil, false jika gagal
        return $subscriberToUpdate->save();
    }
}
