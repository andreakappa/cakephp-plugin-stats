<?php
namespace Stats\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stats Model
 *
 * @property \Stats\Model\Table\PhinxlogTable|\Cake\ORM\Association\BelongsToMany $Phinxlog
 *
 * @method \Stats\Model\Entity\Stat get($primaryKey, $options = [])
 * @method \Stats\Model\Entity\Stat newEntity($data = null, array $options = [])
 * @method \Stats\Model\Entity\Stat[] newEntities(array $data, array $options = [])
 * @method \Stats\Model\Entity\Stat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Stats\Model\Entity\Stat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Stats\Model\Entity\Stat[] patchEntities($entities, array $data, array $options = [])
 * @method \Stats\Model\Entity\Stat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StatsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('stats');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Phinxlog', [
            'foreignKey' => 'stat_id',
            'targetForeignKey' => 'phinxlog_id',
            'joinTable' => 'stats_phinxlog',
            'className' => 'Stats.Phinxlog'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('controller');

        $validator
            ->allowEmpty('action');

        $validator
            ->allowEmpty('query');

        $validator
            ->allowEmpty('user');

        return $validator;
    }


    public function createNewRecord($params, $user = null)
    {
        $entry = $this->newEntity();
        $entry->controller = $params['controller'];
        $entry->action = $params['action'];
        $entry->query = implode(";", $params['pass']);
        $entry->returned = null;

        if ($user) {
            $entry->user_id = $user->id;
        }

        return $entry;
    }
}